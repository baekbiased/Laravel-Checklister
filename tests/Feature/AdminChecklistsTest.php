<?php

namespace Tests\Feature;

use App\Models\ChecklistGroup;
use App\Models\User;
use App\Services\MenuService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminChecklistsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test
     *
     * @return void
    */


    public function test_example()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('admin/checklist_groups', [
            'name' => 'First Group'
        ]);
        $response->assertRedirect('welcome');

        $group = ChecklistGroup::where('name', 'First Group')->first();
        $this->assertNotNull($group);

        $response = $this->actingAs($admin)->get('admin/checklist_groups/'.$group->id.'/edit');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->put('admin/checklist_groups/'.$group->id, [
            'name' => 'Updated First Group'
        ]);

        $response->assertRedirect('welcome');

        $group = ChecklistGroup::where('name', 'Updated First Group')->first();
        $this->assertNotNull($group);

        $menu = (New MenuService())->get_menu();

        $this->assertEquals(1, $menu['admin_menu']->where('name', 'Updated First Group')->count());

    }
}

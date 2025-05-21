<?php

namespace Tests\Feature\Controllers;

use App\Models\Wa;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WaControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_was(): void
    {
        $was = Wa::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('was.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.was.index')
            ->assertViewHas('was');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_wa(): void
    {
        $response = $this->get(route('was.create'));

        $response->assertOk()->assertViewIs('app.was.create');
    }

    /**
     * @test
     */
    public function it_stores_the_wa(): void
    {
        $data = Wa::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('was.store'), $data);

        $this->assertDatabaseHas('was', $data);

        $wa = Wa::latest('id')->first();

        $response->assertRedirect(route('was.edit', $wa));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_wa(): void
    {
        $wa = Wa::factory()->create();

        $response = $this->get(route('was.show', $wa));

        $response
            ->assertOk()
            ->assertViewIs('app.was.show')
            ->assertViewHas('wa');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_wa(): void
    {
        $wa = Wa::factory()->create();

        $response = $this->get(route('was.edit', $wa));

        $response
            ->assertOk()
            ->assertViewIs('app.was.edit')
            ->assertViewHas('wa');
    }

    /**
     * @test
     */
    public function it_updates_the_wa(): void
    {
        $wa = Wa::factory()->create();

        $data = [
            'wa' => $this->faker->text(255),
        ];

        $response = $this->put(route('was.update', $wa), $data);

        $data['id'] = $wa->id;

        $this->assertDatabaseHas('was', $data);

        $response->assertRedirect(route('was.edit', $wa));
    }

    /**
     * @test
     */
    public function it_deletes_the_wa(): void
    {
        $wa = Wa::factory()->create();

        $response = $this->delete(route('was.destroy', $wa));

        $response->assertRedirect(route('was.index'));

        $this->assertModelMissing($wa);
    }
}

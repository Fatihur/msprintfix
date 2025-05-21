<?php

namespace Tests\Feature\Api;

use App\Models\Wa;
use App\Models\User;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WaTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_was_list(): void
    {
        $was = Wa::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.was.index'));

        $response->assertOk()->assertSee($was[0]->wa);
    }

    /**
     * @test
     */
    public function it_stores_the_wa(): void
    {
        $data = Wa::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.was.store'), $data);

        $this->assertDatabaseHas('was', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.was.update', $wa), $data);

        $data['id'] = $wa->id;

        $this->assertDatabaseHas('was', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_wa(): void
    {
        $wa = Wa::factory()->create();

        $response = $this->deleteJson(route('api.was.destroy', $wa));

        $this->assertModelMissing($wa);

        $response->assertNoContent();
    }
}

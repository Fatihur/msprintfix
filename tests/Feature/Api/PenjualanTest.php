<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Penjualan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenjualanTest extends TestCase
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
    public function it_gets_penjualans_list(): void
    {
        $penjualans = Penjualan::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.penjualans.index'));

        $response->assertOk()->assertSee($penjualans[0]->tanggal);
    }

    /**
     * @test
     */
    public function it_stores_the_penjualan(): void
    {
        $data = Penjualan::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.penjualans.store'), $data);

        $this->assertDatabaseHas('penjualans', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_penjualan(): void
    {
        $penjualan = Penjualan::factory()->create();

        $data = [
            'tanggal' => $this->faker->date(),
            'konsumen' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.penjualans.update', $penjualan),
            $data
        );

        $data['id'] = $penjualan->id;

        $this->assertDatabaseHas('penjualans', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_penjualan(): void
    {
        $penjualan = Penjualan::factory()->create();

        $response = $this->deleteJson(
            route('api.penjualans.destroy', $penjualan)
        );

        $this->assertModelMissing($penjualan);

        $response->assertNoContent();
    }
}

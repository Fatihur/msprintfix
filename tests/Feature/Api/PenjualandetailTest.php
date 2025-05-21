<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Penjualandetail;

use App\Models\Produk;
use App\Models\Penjualan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenjualandetailTest extends TestCase
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
    public function it_gets_penjualandetails_list(): void
    {
        $penjualandetails = Penjualandetail::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.penjualandetails.index'));

        $response->assertOk()->assertSee($penjualandetails[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_penjualandetail(): void
    {
        $data = Penjualandetail::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.penjualandetails.store'), $data);

        $this->assertDatabaseHas('penjualandetails', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_penjualandetail(): void
    {
        $penjualandetail = Penjualandetail::factory()->create();

        $penjualan = Penjualan::factory()->create();
        $produk = Produk::factory()->create();

        $data = [
            'penjualan_id' => $this->faker->randomNumber(),
            'produk_id' => $this->faker->randomNumber(),
            'jumlah' => $this->faker->randomNumber(1),
            'total' => $this->faker->randomFloat(2, 0, 9999),
            'penjualan_id' => $penjualan->id,
            'produk_id' => $produk->id,
        ];

        $response = $this->putJson(
            route('api.penjualandetails.update', $penjualandetail),
            $data
        );

        $data['id'] = $penjualandetail->id;

        $this->assertDatabaseHas('penjualandetails', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_penjualandetail(): void
    {
        $penjualandetail = Penjualandetail::factory()->create();

        $response = $this->deleteJson(
            route('api.penjualandetails.destroy', $penjualandetail)
        );

        $this->assertModelMissing($penjualandetail);

        $response->assertNoContent();
    }
}

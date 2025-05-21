<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Penjualan;
use App\Models\Penjualandetail;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenjualanPenjualandetailsTest extends TestCase
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
    public function it_gets_penjualan_penjualandetails(): void
    {
        $penjualan = Penjualan::factory()->create();
        $penjualandetails = Penjualandetail::factory()
            ->count(2)
            ->create([
                'penjualan_id' => $penjualan->id,
            ]);

        $response = $this->getJson(
            route('api.penjualans.penjualandetails.index', $penjualan)
        );

        $response->assertOk()->assertSee($penjualandetails[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_penjualan_penjualandetails(): void
    {
        $penjualan = Penjualan::factory()->create();
        $data = Penjualandetail::factory()
            ->make([
                'penjualan_id' => $penjualan->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.penjualans.penjualandetails.store', $penjualan),
            $data
        );

        $this->assertDatabaseHas('penjualandetails', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $penjualandetail = Penjualandetail::latest('id')->first();

        $this->assertEquals($penjualan->id, $penjualandetail->penjualan_id);
    }
}

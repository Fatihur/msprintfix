<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Produk;
use App\Models\Penjualandetail;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdukPenjualandetailsTest extends TestCase
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
    public function it_gets_produk_penjualandetails(): void
    {
        $produk = Produk::factory()->create();
        $penjualandetails = Penjualandetail::factory()
            ->count(2)
            ->create([
                'produk_id' => $produk->id,
            ]);

        $response = $this->getJson(
            route('api.produks.penjualandetails.index', $produk)
        );

        $response->assertOk()->assertSee($penjualandetails[0]->id);
    }

    /**
     * @test
     */
    public function it_stores_the_produk_penjualandetails(): void
    {
        $produk = Produk::factory()->create();
        $data = Penjualandetail::factory()
            ->make([
                'produk_id' => $produk->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.produks.penjualandetails.store', $produk),
            $data
        );

        $this->assertDatabaseHas('penjualandetails', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $penjualandetail = Penjualandetail::latest('id')->first();

        $this->assertEquals($produk->id, $penjualandetail->produk_id);
    }
}

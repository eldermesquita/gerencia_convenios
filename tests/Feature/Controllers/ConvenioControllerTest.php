<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Convenio;

use App\Models\Orgao;
use App\Models\Contrato;
use Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\Assert;
use Inertia\Testing\AssertableInertia;

/** @returns TestResponse|LegacyTestResponse */
/*  function makeMockRequest($view)
{
    app('router')->get('/example-url', function () use ($view) {
        return $view;
    });

    return $this->get('/example-url');
} */

class ConvenioControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */

    public function exibe_lista_index_convenios(): void
    {

        /*

        try {
            $response->assertViewHas('page');
            $page = json_decode(json_encode($response->viewData('page')), true);

            PHPUnit::assertIsArray($page);
            PHPUnit::assertArrayHasKey('component', $page);
            PHPUnit::assertArrayHasKey('props', $page);
            PHPUnit::assertArrayHasKey('url', $page);
            PHPUnit::assertArrayHasKey('version', $page);
        } catch (AssertionFailedError $e) {
            PHPUnit::fail('Not a valid Inertia response.');
        }


        $this->get('/podcasts/41')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Podcasts/Show')
                ->has('podcast', fn (Assert $page) => $page
                    ->where('id', $podcast->id);
    );
     $response->assertInertia(fn(AssertableInertia $page) => $page
                ->component("Convenio/Index")
                ->where("data.convenios.id", $convenio->id)
                ->where("convenios.numero", $convenio->numero),
        );

        $response->dd(); */

  try {
        $criarConvenios = Convenio::factory()->count(4)->create();
        $convenios =Convenio::query()->whereKey(1)->first();
        $convenios->refresh();
        $response = $this->get(route('convenios.index'));
        $response->assertInertia(fn (AssertableInertia $page) =>
                 $page->component('Convenio/Index',true)
                ->has("convenios")
            );
        } catch (Exception $e) {
           dd($e->getMessage());
        }
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_convenio(): void
    {
        $response = $this->get(route('convenios.create'));

        $response->assertOk()->assertViewIs('app.convenios.create');
    }

    /**
     * @test
     */
    public function it_stores_the_convenio(): void
    {
        $data = Convenio::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('convenios.store'), $data);

        $this->assertDatabaseHas('convenios', $data);

        $convenio = Convenio::latest('id')->first();

        $response->assertRedirect(route('convenios.edit', $convenio));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_convenio(): void
    {
        $convenio = Convenio::factory()->create();

        $response = $this->get(route('convenios.show', $convenio));

        $response
            ->assertOk()
            ->assertViewIs('app.convenios.show')
            ->assertViewHas('convenio');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_convenio(): void
    {
        $convenio = Convenio::factory()->create();

        $response = $this->get(route('convenios.edit', $convenio));

        $response
            ->assertOk()
            ->assertViewIs('app.convenios.edit')
            ->assertViewHas('convenio');
    }

    /**
     * @test
     */
    public function it_updates_the_convenio(): void
    {
        $convenio = Convenio::factory()->create();

        $contrato = Contrato::factory()->create();
        $orgao = Orgao::factory()->create();

        $data = [
            'numero' => $this->faker->text(50),
            'objeto' => $this->faker->text(),
            'numero_processo' => $this->faker->text(30),
            'valor_repasse' => $this->faker->randomNumber(2),
            'valor_contra_partida' => $this->faker->randomNumber(2),
            'valor_total' => $this->faker->randomNumber(2),
            'valor_liberado_concedente' => $this->faker->randomNumber(2),
            'valor_pago' => $this->faker->randomNumber(2),
            'valor_liberado' => $this->faker->randomNumber(2),
            'virgencia_execucao' => $this->faker->date(),
            'virgencia_contrato' => $this->faker->date(),
            'contrato_id' => $contrato->id,
            'orgao_id' => $orgao->id,
        ];

        $response = $this->put(route('convenios.update', $convenio), $data);

        $data['id'] = $convenio->id;

        $this->assertDatabaseHas('convenios', $data);

        $response->assertRedirect(route('convenios.edit', $convenio));
    }

    /**
     * @test
     */
    public function it_deletes_the_convenio(): void
    {
        $convenio = Convenio::factory()->create();

        $response = $this->delete(route('convenios.destroy', $convenio));

        $response->assertRedirect(route('convenios.index'));

        $this->assertModelMissing($convenio);
    }
}

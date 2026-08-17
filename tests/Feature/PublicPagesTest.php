<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_home_page_loads(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    public function test_products_index_loads(): void
    {
        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
    }

    public function test_products_index_shows_active_products(): void
    {
        $brand = Brand::factory()->create();
        $activeProduct = Product::factory()->create(['brand_id' => $brand->id, 'status' => 'active']);
        Product::factory()->create(['brand_id' => $brand->id, 'status' => 'inactive']);

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertSee($activeProduct->name);
    }

    public function test_products_index_filters_by_brand(): void
    {
        $brand1 = Brand::factory()->create();
        $brand2 = Brand::factory()->create();
        $product1 = Product::factory()->create(['brand_id' => $brand1->id, 'status' => 'active']);
        $product2 = Product::factory()->create(['brand_id' => $brand2->id, 'status' => 'active']);

        $response = $this->get(route('products.index', ['brand' => $brand1->id]));

        $response->assertStatus(200);
        $response->assertSee($product1->name);
        $response->assertDontSee($product2->name);
    }

    public function test_products_index_search_works(): void
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create(['brand_id' => $brand->id, 'status' => 'active', 'name' => 'SpecialWidget']);

        $response = $this->get(route('products.index', ['search' => 'Special']));

        $response->assertStatus(200);
        $response->assertSee('SpecialWidget');
    }

    public function test_product_show_loads_active_product(): void
    {
        $brand = Brand::factory()->create();
        $product = Product::factory()->create(['brand_id' => $brand->id, 'status' => 'active', 'slug' => 'test-product']);

        $response = $this->get(route('products.show', ['slug' => 'test-product']));

        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    public function test_product_show_returns_view_for_inactive_product(): void
    {
        Product::factory()->create(['slug' => 'inactive-product', 'status' => 'inactive']);

        $response = $this->get(route('products.show', ['slug' => 'inactive-product']));

        $response->assertStatus(200);
    }

    public function test_projects_index_loads(): void
    {
        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
    }

    public function test_projects_index_shows_published_projects(): void
    {
        $brand = Brand::factory()->create();
        $published = Project::factory()->create(['brand_id' => $brand->id, 'status' => 'published']);
        Project::factory()->create(['brand_id' => $brand->id, 'status' => 'draft']);

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertSee($published->title);
    }

    public function test_articles_index_loads(): void
    {
        $response = $this->get(route('articles.index'));

        $response->assertStatus(200);
    }

    public function test_articles_index_shows_published_articles(): void
    {
        $published = Article::factory()->create(['status' => 'published']);
        Article::factory()->create(['status' => 'draft']);

        $response = $this->get(route('articles.index'));

        $response->assertStatus(200);
        $response->assertSee($published->title);
    }

    public function test_article_show_loads_published_article(): void
    {
        $article = Article::factory()->create([
            'status' => 'published',
            'slug' => 'test-article'
        ]);

        $response = $this->get(route('articles.show', ['slug' => 'test-article']));

        $response->assertStatus(200);
        $response->assertSee($article->title);
    }

    public function test_contact_page_loads(): void
    {
        Setting::factory()->create(['key' => 'contact_email']);

        $response = $this->get(route('contact'));

        $response->assertStatus(200);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->post(route('contact.submit'), []);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    }

    public function test_contact_form_validates_email_format(): void
    {
        $response = $this->post(route('contact.submit'), [
            'name' => 'John',
            'email' => 'not-an-email',
            'subject' => 'Subject',
            'message' => 'Message',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_contact_form_creates_contact_and_redirects(): void
    {
        $response = $this->post(route('contact.submit'), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'subject' => 'Test Subject',
            'message' => 'Test message content',
        ]);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', [
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
        ]);
    }
}

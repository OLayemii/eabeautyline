<?php
    namespace Tests\Feature;
    
    use Tests\TestCase;
    use App\User;
    use Illuminate\Foundation\Testing\WithoutMiddleware;
    
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    
    use Illuminate\Foundation\Testing\DatabaseTransactions;

    class FooTest extends TestCase{
        public function testHasItemInBasket(){
            $this->assertTrue($this->visit('/api/user'));
        }
    }
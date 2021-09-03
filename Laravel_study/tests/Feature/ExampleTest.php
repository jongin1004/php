<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testBasicExample()
    // {
    //     //ithHeaders 메소드를 사용하여 요청-requestr가 애플리케이션에 전달되기 전에 헤더를 커스터마이징 할 수 있습니다. 
    //     $response = $this->withHeaders([
    //         'X-Header' => 'Value',
    //     ])->json('POST', '/');

    //     $response
    //         ->assertStatus(405)
    //         ->assertJson([
    //             'created' => false,
    //         ]);

    //     // $response->assertStatus(300);
    // }

    public function testCookies()
    {
        //withCookie 또는 withCookies 메소드를 사용하여 요청하기 전에 쿠키 값을 설정할 수 있습니다.
        $response = $this->withCookie('color', 'blue')->get('/');

        $response = $this->withCookies([
            'color' => 'blue',
            'name' => 'Taylor',
        ])->get('/');

        $response->assertStatus(200);
    }

    // public function testBasicTest()
    // {
    //     // 애플리케이션에 테스트 요청을 한 후에는 dump, dumpHeaders 및 dumpSession 메소드를 사용하여 응답 내용을 검사하고 디버그 할 수 있습니다.
    //     $response = $this->get('/');

    //     //일반적인 세션의 이용법 중 하나는 인증된 사용자를 위해서 상태를 유지하는 것입니다.
        // $response = $this->withSession(['foo' => 'bar'])
        //                  ->get('/');

        // $response->assertCookie("foo", "bar");
    //     // $response->dumpHeaders();

        // $response->dumpSession();

    //     // $response->dump();
    // }

    public function testApplication()
    {
        //actingAs 헬퍼 메소드는 특정 사용자를 현재 사용자로 인증하는 단순한 방법을 제공합니다. 
        //예를 들어, 사용자를 생성하고 인증하기 위해 model factory를 사용할 수 있습니다.
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/');

        $response->assertStatus(200);
    }
    
    // public function testBasicExample()
    // {
    //     $response = $this->postJson('/user', ['name' => 'Sally']);

    //     $response
    //         ->assertStatus(201)
    //         ->assertJson([
    //             'created' => true,
    //         ]);
    // }

    public function testWelcomeView()
    {
        //view 메소드는 뷰 이름과 선택적인 데이터 배열을 허용합니다. 
        // $view = $this->view('User', ['name' => 'Taylor']);

        // // assertSee, assertSeeInOrder, assertSeeText, assertSeeTextInOrder, assertDontSee 및 assertDontSeeText와 같은 검증 메소드를 제공합니다.
        // $view->assertSee('Taylor');
        
        //오류 메시지를 error bag에 녹여내려면 withViewErrors 메소드를 사용할 수 있습니다.
        $view = $this->withViewErrors([
            'name' => ['Please provide a valid name.']
        ])->view('User');

        $view->assertSee('Please provide a valid name.');
    }  

    //또 assertExitCode 와 expectsOutput 메소드를 사용하여 
    //콘솔 명령으로 출력 할 것으로 예상되는 종료 코드와 텍스트를 지정할 수 있습니다. 예를 들어 다음과 같은 console 명령을 생각해보십시오.
    public function testConsoleCommand()
    {
        Artisan::command('question', function () {
        $name = $this->ask('What is your name?');

        $language = $this->choice('Which language do you program in?', [
            'PHP',
            'Ruby',
            'Python',
        ]);

    $this->line('Your name is '.$name.' and you program in '.$language.'.');
});

        $this->artisan('question')
            ->expectsQuestion('What is your name?', 'Taylor Otwell')
            ->expectsQuestion('Which language do you program in?', 'PHP')
            ->expectsOutput('Your name is Taylor Otwell and you program in PHP.')
            ->assertExitCode(0);
    }
}

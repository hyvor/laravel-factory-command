<?php

use Illuminate\Support\Facades\Artisan;

it('fails on invalid JSON', function () {
    $this->artisan('hyvor:factory "invalid"')
        ->assertFailed()
        ->expectsOutput('Invalid JSON');
});

it('fails when model is not specifiied', function() {
    $this->artisan('hyvor:factory \'{"foo": "bar"}\'')
        ->assertFailed()
        ->expectsOutput('Model not specified');
});

it('fails when model does not exist', function() {
    $this->artisan('hyvor:factory', [
            'json' => json_encode(['model' => 'Foo\\Bar\\Baz'])
        ])
        ->assertFailed()
        ->expectsOutput('Model does not exist');
});

it('creates a model', function() {

    $json = json_encode(['model' => 'Hyvor\\LaravelFactoryCommand\\Tests\\User']);
    $code = Artisan::call('hyvor:factory', ['json' => $json]);

    expect($code)->toBe(0);

    $json = json_decode(Artisan::output(), true);

    expect($json)->toBeArray();
    expect($json['id'])->toBeInt();
    expect($json['name'])->toBeString();
    expect($json['email'])->toBeString()->toContain('@');

});

it('creates multiple models', function() {

    $json = json_encode([
        'model' => 'Hyvor\\LaravelFactoryCommand\\Tests\\User',
        'count' => 3
    ]);
    Artisan::call('hyvor:factory', ['json' => $json]);

    $json = json_decode(Artisan::output(), true);

    expect($json)->toBeArray();
    expect($json)->toHaveCount(3);

    foreach ($json as $user) {
        expect($user['id'])->toBeInt();
        expect($user['name'])->toBeString();
        expect($user['email'])->toBeString()->toContain('@');
    }

});

it('creates with attributes', function() {

    $json = json_encode([
        'model' => 'Hyvor\\LaravelFactoryCommand\\Tests\\User',
        'attributes' => [
            'name' => 'Supun',
            'email' => 'supun@hyvor.com'
        ]
    ]);
    $code = Artisan::call('hyvor:factory', ['json' => $json]);

    expect($code)->toBe(0);
    $json = json_decode(Artisan::output(), true);
    expect($json['name'])->toBe('Supun');
    expect($json['email'])->toBe('supun@hyvor.com');

});
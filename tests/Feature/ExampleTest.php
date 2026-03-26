<?php

test('returns a successful response', function () {
    $response = $this->get(route('dashboard'));

    $response->assertRedirect(route('login'));
});

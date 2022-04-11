@extends('layouts.app')

@section('content')
    @php
        $home = get_fields();
    @endphp

    <div class="rm-c-Home">

        <div class="rm-c-Home-top rm-u-hspace">
            <div class="rm-c-Home-top-wrapper rm-u-wrapper">
                <div class="rm-c-Home-top-logo">
                    <img src="{{ $home['top']['logo']['url'] }}" alt="{{ $home['top']['logo']['alt'] }}" />
                </div>

                <ul class="rm-c-Home-top-shortcuts">
                    @foreach ($home['top']['shortcuts'] as $shortcut)
                        @include('components.btn', ['type' => 'a', 'mode' => 'classic', 'style' => 'secondary', 'text' => $shortcut['cta']['title'], 'href' => $shortcut['cta']['url'], 'target' => $shortcut['cta']['target'],  'arrow' => 'next', 'animationDelay' => ($loop->iteration * 0.4) + 1 ])
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="rm-c-Home-featured rm-u-hspace">
            <div class="rm-c-Home-featured-wrapper rm-u-wrapper">
                <h2 class="rm-c-Home-featured-heading">
                    À la une !
                </h2>

                <div class="rm-c-Home-featured-list">
                    <div class="rm-c-Home-featured-list-wrapper">
                        <ul>
                            @for ($i = 0; $i < 10; $i++)
                                @foreach ($home['featured_posts'] as $post)
                                    <li class="rm-c-ProjectMiniature">
                                        <a class="rm-c-ProjectMiniature-wrapper"
                                        href="{{ get_permalink($post->ID) }}"
                                        title="{{ $post->post_title }}">

                                            <span>{{ $post->post_title }}</span>
                                            {!! get_the_post_thumbnail($post->ID) !!}
                                        </a>
                                    </li>
                                @endforeach
                            @endfor
                        </ul>
                    </div>

                    <button data-slider="prev"> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Précédent', 'arrow' => 'back']) </button>
                    <button data-slider="next"> @include('components.btn', ['type' => 'div', 'mode' => 'minimal', 'text' => 'Suivant', 'arrow' => 'next']) </button>
                </div>
            </div>
        </div>
    </div>
@endsection

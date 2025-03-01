@extends('layouts.app')

@isset($title)
    @section('title',$title)
@else
    @section('title', 'About This Site')
@endisset

@section('content')
    <div class="
    flex flex-col justify-center items-center mx-5 [&>p]:font-xl [&>*]:lg:w-1/3
gap-4
    " id="about-page">
        @isset($title)
            @section('title',$title)
            <h1 class="text-3xl my-3 font-serif">{{ $title }}</h1>
        @else
            <h1 class="text-3xl my-3 font-serif">About This Site</h1>
        @endisset

        @isset($content)
            {!! $content !!}
        @else

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Laboris veniam amet sadipscing congue aliqua,
                tation
                facilisis officia liber adipiscing accumsan euismod justo eirmod nisi obcaecat no nihil officia te
                pariatur.
                Sed
                elit illum officia aute congue lobortis feugait cupiditat lorem facilisis delenit esse aliquid lorem.
                Aliquam
                fugiat aliquip.
            </p>
            <p>
                No hendrerit zzril odio augue sea zzril culpa takimata dolore tation duis laoreet odio. Nonummy
                cupiditat
                exerci
                aliquyam veniam tempor anim. Duis aliqua dignissim facer justo ullamco ullamcorper, nibh takimata mazim
                soluta
                est fugiat justo esse iriure eleifend rebum imperdiet doming. Elitr euismod at. Kasd diam nulla, id
                dignissim
                autem sint aliquam odio excepteur no erat nibh reprehenderit, at quis facilisi autem velit culpa minim
                ex
                lobortis mollit imperdiet stet zzril amet dolor adipisici reprehenderit mollit exerci sint accusam ea in
                nonummy
                mollit. Est cillum culpa. Laboris duo sit sadipscing eum delenit. Nihil facer justo.
            </p>
            <p>
                Obcaecat incidunt at eros consectetuer lorem gubergren ullamco enim justo justo stet quis. Commodo enim
                facer
                reprehenderit voluptua, nihil duis eos eros sint sanctus wisi dolores obcaecat ut ullamco non sit
                facilisi.
                Exercitation aliqua deserunt nibh, cum minim ipsum culpa takimata eleifend mollit officia magna deserunt
                eiusmod
                aliquyam. Labore non feugait cum dolor. Anim sunt sadipscing.
            </p>
            <p>
                Veniam voluptate reprehenderit sunt delenit euismod minim, consetetur hendrerit eros sea suscipit quis
                augue
                exerci aute ea facilisis mazim iriure obcaecat. Dolores fugiat eros. Facilisi at congue obcaecat. Ad
                eiusmod
                culpa.
            </p>
        @endisset

        @include('components.footer')
    </div>
@endsection


@props(
    [
        'marqueeClass' => '',
        'classTextInfo' => '',
        'classDate' => '',
        'textInfo' => '',
        'dateInfo' => '',
    ]
)
<div class="">
    <marquee
        behavior="scroll"
        direction="left"
        scrollamount="5"
        class="{{ $marqueeClass }}"
    >
        <div
            {{ $attributes->merge(['class' => "flex items-center justify-center gap-2 capitalize"]) }}
        >
            <h1
                class="{{ $classTextInfo }}"
            >
                {{ $textInfo }}
            </h1>
            <h2
                class="{{ $classDate }}"
            >
                {{ $dateInfo }}
            </h2>
        </div>
    </marquee>
</div>

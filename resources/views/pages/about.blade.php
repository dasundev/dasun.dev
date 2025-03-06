<?php
use Livewire\Volt\Component;

new class extends Component {
    public function render(): mixed
    {
        return view('pages.about')
            ->title('About')
            ->layoutData(['description' => "I'm a Laravel Full-stack developer from the beautiful island of Sri Lanka. I've done everything from designing websites to setting up the servers they run on. These days, I'm focusing on giving back to the open-source community."]);
    }
}
?>

<div class="prose text-zinc-100 text-base max-w-4xl">
    <h1 class="text-4xl font-bold tracking-tight leading-normal text-zinc-100 md:text-5xl">Hi there, I'm Dasun Tharanga.</h1>
    <img src="{{ Vite::image('dasun.jpeg') }}" class="sm:float-right mx-auto sm:ml-16 mb-10 w-56 sm:w-48 rounded-md shadow-lg sm:rotate-2 sm:hover:rotate-3 hover:scale-105 hover:shadow-2xl transition duration-150" alt="Dasun Tharanga">
    <p>
        I'm a Laravel Full-stack developer from the beautiful island of Sri Lanka. I've done everything from designing websites to setting up the servers they run on. These days, I'm focusing on giving back to the open-source community.
    </p>
    <p>
        Some interesting projects I've worked on include:
    </p>
    <ul>
        <li>A Dropzone component for Livewire</li>
        <li>A Laravel plugin for PayHere payment gateway.</li>
        <li>A middleware for FilamentPHP that enables secure access to panels.</li>
    </ul>
    <p>I care deeply about best practices, open standards, privacy, and creating great experiences for both users and developers.</p>
    <p>When I'm not coding, I love traveling, motorcycles, beer, and heavy music.</p>
</div>

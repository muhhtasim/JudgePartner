@extends('layouts.app')

@section('title', 'Dashboard - JudgeMate')

@section('content')
    <section class="mx-auto max-w-3xl rounded-2xl border border-slate-200 bg-white p-8 shadow-sm dark:border-slate-800 dark:bg-slate-900 sm:p-10">
        <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Dashboard</p>
        <h1 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">
            Welcome, {{ auth()->user()->name }}
        </h1>
        <p class="mt-3 text-slate-600 dark:text-slate-300">
            You are signed in to JudgeMate.
        </p>
    </section>
@endsection

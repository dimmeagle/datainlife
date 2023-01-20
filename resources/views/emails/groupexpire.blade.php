<x-mail::message>
# Introduction

Здравствуйте {{ $user->name }}! Истекло время вашего участия в группе {{ $group->name }}.
<br>
{{ config('app.name') }}
</x-mail::message>

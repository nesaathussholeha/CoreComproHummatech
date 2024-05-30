<x-mail::message>
# Halo admin hummatech!

Ada pesan baru untuk anda, dengan detail berikut ini: Nama Pengirim "{{ $name }}", Nomor Ponsel Pengirim "{{ $phone }}", Surel Pengirim "{{ $email }}".

**Dan isi pesannya adalah:**
{!! $comments !!}

Terimakasih,<br>
{{ config('app.name') }}
</x-mail::message>

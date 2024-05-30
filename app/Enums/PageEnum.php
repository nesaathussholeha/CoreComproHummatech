<?php
namespace App\Enums;

enum PageEnum :string
{
    case TENTANG = 'Tentang Kami';
    case PROFILE = 'Profile';
    case VISIMISI = 'Visi & Misi';
    case ORGANISASI = 'Struktur Organisasi';
    case USAHA = 'Struktur Usaha';
    case LOGO = 'Logo';
    case TIM = 'Tim';
    case LAYANAN = 'Layanan';
    case PORTOFOLIO = 'Portofolio';
    case BERITA = 'Berita';
    case HUBUNGI = 'Hubungi Kami';
    case LOWONGAN = 'Lowongan';
    case MITRA = 'Mitra Kami';
}


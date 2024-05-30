<?php

namespace App\Enums;

enum TypeEnum: string
{
    case BRANCH = 'branch';
    case CENTER = 'center';
    case SALE = 'sale';
    case SERVICE = 'service';
    case PARTNER = 'partner';
    case MITRA = 'mitra';
    case PRODUCT = 'product';
    case SECTION = 'section';
    case PROPOSAL = 'proposal';
    case NEWS = 'news';
    case NEWSDESC = 'news-images';
    case TEAM = 'team';
    case SOSIALMEDIA = 'sosialmedia';
    case TESTIMONIAL = 'testimonial';
    case SHOP = 'shop';
    case PROFILE = 'profile';
    case GALLERY = 'gallery';
    case ENTERPRISESTRUCTURE = 'business';
    case ORGANIZATION = 'organization';
    case VACANCY = 'vacancy';
    case STRUCTURE = 'structure';
    case BACKGROUND = 'background';
}

<?php 

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Bidang = 'bidang';
    case Kadis = 'kadis';
}
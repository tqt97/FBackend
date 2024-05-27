<?php

namespace App\Enums;

enum PostStatus: string
{
    case PENDING = 'pending';
    case SCHEDULED = 'scheduled';
    case PUBLISHED = 'published';
}

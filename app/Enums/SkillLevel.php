<?php

namespace App\Enums;

enum SkillLevel: string
{
    case Beginner       = 'beginner';
    case Intermediate   = 'intermediate';
    case Advanced       = 'advanced';
    case Expert         = 'expert';

    public static function fromString(string $level): ?SkillLevel
    {
        return match (strtolower($level)) {
            'beginner', 'novice', 'junior'  => self::Beginner,
            'intermediate', 'mid-level'     => self::Intermediate,
            'advanced', 'senior'            => self::Advanced,
            'expert', 'master'              => self::Expert,
            default                         => null,
        };
    }

    public function title(): string
    {
        return match ($this) {
            SkillLevel::Beginner        => 'Beginner',
            SkillLevel::Intermediate    => 'Intermediate',
            SkillLevel::Advanced        => 'Advanced',
            SkillLevel::Expert          => 'Expert',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Beginner => 'bg-green-100 text-green-800',
            self::Intermediate => 'bg-emerald-100 text-emerald-800',
            self::Advanced => 'bg-blue-100 text-blue-800',
            self::Expert => 'bg-sky-100 text-sky-800',
        };
    }
}

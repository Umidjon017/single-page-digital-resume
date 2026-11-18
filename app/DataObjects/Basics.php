<?php

namespace App\DataObjects;

readonly class Basics
{
    /**
     * @param  array<SocialProfile>  $profiles
     */
    public function __construct(
        public string $name = '',
        public string $label = '',
        public string $image = '',
        public string $email = '',
        public string $phone = '',
        public string $url = '',
        public string $summary = '',
        public Location $location = new Location,
        public array $profiles = [],
    ) {}

    public static function fromArray(array $data): self
    {
        $location = Location::fromArray($data['location'] ?? null);

        $profiles = array_map(
            fn (array $profile): SocialProfile => SocialProfile::fromArray($profile),
            $data['profiles'] ?? [],
        );

        return new self(
            $data['name'] ?? '',
            $data['label'] ?? '',
            $data['image'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['url'] ?? '',
            $data['summary'] ?? '',
            $location,
            $profiles,
        );
    }
}

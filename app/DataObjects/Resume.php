<?php

namespace App\DataObjects;

readonly class Resume
{
    /**
     * @param  list<Work>  $work
     * @param  list<Skill>  $skills
     * @param  list<Education>  $education
     * @param  list<Volunteer>  $volunteer
     * @param  list<Award>  $awards
     * @param  list<Certificate>  $certificates
     * @param  list<Publication>  $publications
     * @param  list<Language>  $languages
     * @param  list<Interest>  $interests
     * @param  list<Reference>  $references
     * @param  list<Project>  $projects
     */
    public function __construct(
        public Basics $basics,
        public array $work = [],
        public array $volunteer = [],
        public array $education = [],
        public array $awards = [],
        public array $certificates = [],
        public array $publications = [],
        public array $skills = [],
        public array $languages = [],
        public array $interests = [],
        public array $references = [],
        public array $projects = [],
    ) {}

    public static function fromArray(array $data): self
    {
        $work = array_map(
            fn (array $item): Work => Work::fromArray($item),
            $data['work'] ?? [],
        );

        $skills = array_map(
            fn (array $item): Skill => Skill::fromArray($item),
            $data['skills'] ?? [],
        );

        $education = array_map(
            fn (array $item): Education => Education::fromArray($item),
            $data['education'] ?? [],
        );

        return new self(
            Basics::fromArray($data['basics'] ?? []),
            $work,
            array_map(
                fn (array $item): Volunteer => Volunteer::fromArray($item),
                $data['volunteer'] ?? [],
            ),
            $education,
            array_map(
                fn (array $item): Award => Award::fromArray($item),
                $data['awards'] ?? [],
            ),
            array_map(
                fn (array $item): Certificate => Certificate::fromArray($item),
                $data['certificates'] ?? [],
            ),
            array_map(
                fn (array $item): Publication => Publication::fromArray($item),
                $data['publications'] ?? [],
            ),
            $skills,
            array_map(
                fn (array $item): Language => Language::fromArray($item),
                $data['languages'] ?? [],
            ),
            array_map(
                fn (array $item): Interest => Interest::fromArray($item),
                $data['interests'] ?? [],
            ),
            array_map(
                fn (array $item): Reference => Reference::fromArray($item),
                $data['references'] ?? [],
            ),
            array_map(
                fn (array $item): Project => Project::fromArray($item),
                $data['projects'] ?? [],
            ),
        );
    }
}

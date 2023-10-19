<?php

namespace Model;

class Movie
{
     protected int $id;

     protected string $title;

     protected string $producer;

     protected string $synopsis;

     protected string $category;

     protected string $scenarist;

     protected string $production_company;

     protected string $release_year;

     protected string $poster;

     public function setId(int $id): void
     {
          $this->id = $id;
     }
     public function getId(): int
     {
          return $this->id;
     }
}
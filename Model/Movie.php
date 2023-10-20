<?php

namespace Model;

class Movie
{
     protected int $id;

     protected int $authorId;

     protected string $title;

     protected string $producer;

     protected string $synopsis;

     protected int $categoryId;

     protected string $scenarist;

     protected string $production_company;

     protected string $release_year;

     // protected string $poster;

     public function __construct(
          string $title,
          int $author_id,
          string $producer,
          string $synopsis,
          int $categoryId,
          string $scenarist,
          string $production_company,
          string $release_year,
          //string $poster
     ) {
          $this->title = $title;
          $this->authorId = $author_id;
          $this->producer = $producer;
          $this->synopsis = $synopsis;
          $this->categoryId = $categoryId;
          $this->scenarist = $scenarist;
          $this->production_company = $production_company;
          $this->release_year = $release_year;
          // $this->poster = $poster;
     }
     // Setter and Getter for id
     public function setId(int $id): void
     {
          $this->id = $id;
     }

     public function getId(): int
     {
          return $this->id;
     }

     // Setter and Getter for authorId
     public function setAuthorId(int $authorId): void
     {
          $this->authorId = $authorId;
     }

     public function getAuthorId(): int
     {
          return $this->authorId;
     }

     // Setter and Getter for title
     public function setTitle(string $title): void
     {
          $this->title = $title;
     }

     public function getTitle(): string
     {
          return $this->title;
     }

     // Setter and Getter for producer
     public function setProducer(string $producer): void
     {
          $this->producer = $producer;
     }

     public function getProducer(): string
     {
          return $this->producer;
     }

     // Setter and Getter for synopsis
     public function setSynopsis(string $synopsis): void
     {
          $this->synopsis = $synopsis;
     }

     public function getSynopsis(): string
     {
          return $this->synopsis;
     }

     // Setter and Getter for category
     public function setCategory(int $categoryId): void
     {
          $this->categoryId = $categoryId;
     }

     public function getCategoryId(): int
     {
          return $this->categoryId;
     }

     // Setter and Getter for scenarist
     public function setScenarist(string $scenarist): void
     {
          $this->scenarist = $scenarist;
     }

     public function getScenarist(): string
     {
          return $this->scenarist;
     }

     // Setter and Getter for production_company
     public function setProductionCompany(string $production_company): void
     {
          $this->production_company = $production_company;
     }

     public function getProductionCompany(): string
     {
          return $this->production_company;
     }

     // Setter and Getter for release_year
     public function setReleaseYear(string $release_year): void
     {
          $this->release_year = $release_year;
     }

     public function getReleaseYear(): string
     {
          return $this->release_year;
     }
}
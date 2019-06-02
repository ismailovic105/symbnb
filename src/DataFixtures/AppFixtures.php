<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("FR-fr");
        for($i = 0; $i<=10; $i++){
            $ad = new Ad();
            $title = $faker->sentence();
            $coverImage = $faker->imageUrl(1000,350);
            $intro = $faker->paragraph(2);
            $content = "<p>".join("</p><p>",$faker->paragraphs(5))."</p>";
            $ad->setTitle($title)
                ->setImageCover($coverImage)
                ->setIntroduction($intro)
                ->setContent($content)
                ->setPrice(mt_rand(10,100))
                ->setRooms(mt_rand(1,10));

                $manager->persist($ad);
        }

        $manager->flush();
    }
}

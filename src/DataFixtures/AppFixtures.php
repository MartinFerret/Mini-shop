<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tag;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Tags
        $tagData = [
            ['Office', 'office'],
            ['Gaming', 'gaming'],
            ['Audio', 'audio'],
            ['Mobile', 'mobile'],
            ['USB', 'usb'],
        ];

        $tags = [];

        foreach ($tagData as [$name, $slug]) {
            $tag = new Tag();
            $tag->setName($name);
            $tag->setSlug($slug);
            $manager->persist($tag);
            $tags[$slug] = $tag;
        }

        /**
         * [name, slug, priceCents, isActive, stock, description, imageUrl, tagSlugs[]]
         */
        $products = [
            [
                'Mechanical Keyboard',
                'mechanical-keyboard',
                12990,
                true,
                12,
                'Clavier mécanique avec switchs tactiles, idéal pour le développement.',
                'https://images.unsplash.com/photo-1602025882379-e01cf08baa51?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8TWVjaGFuaWNhbCUyMEtleWJvYXJkfGVufDB8fDB8fHww',
                ['office', 'usb']
            ],
            [
                'Wireless Mouse',
                'wireless-mouse',
                4990,
                true,
                0,
                'Souris sans fil ergonomique pour le travail quotidien.',
                'https://images.unsplash.com/photo-1660491083562-d91a64d6ea9c?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8V2lyZWxlc3MlMjBNb3VzZXxlbnwwfHwwfHx8MA%3D%3D',
                ['office', 'mobile']
            ],
            [
                '27" Monitor',
                '27-monitor',
                18990,
                true,
                5,
                'Écran large haute définition pour productivité.',
                'https://images.unsplash.com/photo-1612813434847-b01fffea46ae?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8MjclMjIlMjBNb25pdG9yfGVufDB8fDB8fHww',
                ['office']
            ],
            [
                'USB-C Hub',
                'usb-c-hub',
                2990,
                false,
                40,
                'Hub USB-C pour connecter tous tes périphériques.',
                'https://plus.unsplash.com/premium_photo-1761043248662-42f371ad31b4?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8VVNCLUMlMjBIdWJ8ZW58MHx8MHx8fDA%3D',
                ['usb', 'mobile']
            ],
            [
                'Studio Headphones',
                'studio-headphones',
                9990,
                true,
                18,
                'Casque studio fermé avec son précis.',
                'https://images.unsplash.com/photo-1718217028088-a23cb3b277c4?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8U3R1ZGlvJTIwSGVhZHBob25lc3xlbnwwfHwwfHx8MA%3D%3D',
                ['audio']
            ],
            [
                'Gaming Mouse',
                'gaming-mouse',
                6990,
                false,
                25,
                'Souris gaming haute précision.',
                'https://images.unsplash.com/photo-1628832307345-7404b47f1751?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8R2FtaW5nJTIwTW91c2V8ZW58MHx8MHx8fDA%3D',
                ['gaming', 'usb']
            ],
            [
                'USB-C Cable',
                'usb-c-cable',
                1290,
                true,
                120,
                'Câble USB-C robuste pour charge et données.',
                'https://images.unsplash.com/photo-1639675960002-2f414c58ed79?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8VVNCLUMlMjBDYWJsZXxlbnwwfHwwfHx8MA%3D%3D',
                ['usb', 'mobile']
            ],
            [
                'Laptop Stand',
                'laptop-stand',
                3490,
                true,
                30,
                'Support pour ordinateur portable.',
                'https://images.unsplash.com/photo-1629317480826-910f729d1709?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8TGFwdG9wJTIwU3RhbmR8ZW58MHx8MHx8fDA%3D',
                ['office']
            ],
            [
                'Desk Lamp',
                'desk-lamp',
                2590,
                true,
                40,
                'Lampe de bureau LED.',
                'https://images.unsplash.com/photo-1621447980929-6638614633c8?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8RGVzayUyMExhbXB8ZW58MHx8MHx8fDA%3D',
                ['office', 'usb']
            ],
            [
                'Bluetooth Speaker',
                'bluetooth-speaker',
                3990,
                true,
                22,
                'Enceinte bluetooth compacte.',
                'https://images.unsplash.com/photo-1589256469067-ea99122bbdc4?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Qmx1ZXRvb3RoJTIwU3BlYWtlcnxlbnwwfHwwfHx8MA%3D%3D',
                ['audio', 'mobile']
            ],
        ];

        foreach ($products as [$name, $slug, $priceCents, $isActive, $stock, $description, $imageUrl, $tagSlugs]) {
            $product = new Product();
            $product->setName($name);
            $product->setSlug($slug);
            $product->setDescription($description);
            $product->setPriceCents($priceCents);
            $product->setIsActive($isActive);
            $product->setStock($stock);
            $product->setImage($imageUrl);

            foreach ($tagSlugs as $tagSlug) {
                $product->addTag($tags[$tagSlug]);
            }

            $manager->persist($product);
        }

        $manager->flush();
    }
}

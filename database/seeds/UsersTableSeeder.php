<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Pietro',
                'surname' => 'Marrazzo',
                'vat' => '12345678910',
                'email' => 'marra@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Il Pizzadiso Ristorante',
                'emailRestaurant' => 'pizzadiso@gmail.com',
                'phone' => '02449678000',
                'address' => 'Via Mincia 7'
            ],
            [
                'name' => 'Alfredo',
                'surname' => 'Di Forti',
                'vat' => '12345678911',
                'email' => 'forti@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Develop Lounge Bar - Pasticceria',
                'emailRestaurant' => 'develop@gmail.com',
                'phone' => '02449678001',
                'address' => 'Via Palermo 10'
            ],
            [
                'name' => 'Stefano',
                'surname' => 'Serafini',
                'vat' => '12345678912',
                'email' => 'serafini@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Forte da Dio',
                'emailRestaurant' => 'fortedd@gmail.com',
                'phone' => '02449678002',
                'address' => 'Via Dante 1'
            ],
            [
                'name' => 'Davide',
                'surname' => 'Benazzi',
                'vat' => '12345678913',
                'email' => 'benaz@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Bena Burger',
                'emailRestaurant' => 'benaburger@gmail.com',
                'phone' => '02449678003',
                'address' => 'Via Patrola 3'
            ],
            [
                'name' => 'Paolo',
                'surname' => 'Duzioni',
                'vat' => '12345678914',
                'email' => 'duzioni@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'FullStack Guru Sushi',
                'emailRestaurant' => 'gurusushi@gmail.com',
                'phone' => '02449678004',
                'address' => 'Via Gianni 6'
            ],
            [
                'name' => 'Lorenzo',
                'surname' => 'Balsano',
                'vat' => '12345678915',
                'email' => 'balsano@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'U\'Ballerino',
                'emailRestaurant' => 'bellerino@gmail.com',
                'phone' => '02449678005',
                'address' => 'Via Palermo 11'
            ],
            [
                'name' => 'Fabio',
                'surname' => 'Giorgini',
                'vat' => '12345678916',
                'email' => 'giorgini@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Insalatine Marchesi',
                'emailRestaurant' => 'insalatine@gmail.com',
                'phone' => '02449678006',
                'address' => 'Via Marche 1'
            ],
            [
                'name' => 'Chiara',
                'surname' => 'Passaro',
                'vat' => '12345678917',
                'email' => 'passaro@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Micio Miao',
                'emailRestaurant' => 'miciomiao@gmail.com',
                'phone' => '02449678007',
                'address' => 'Via Gatto 4'
            ],
            [
                'name' => 'Mark',
                'surname' => 'Zuckenberg',
                'vat' => '12345678918',
                'email' => 'zucker@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Facebook on the Road',
                'emailRestaurant' => 'facebookroad@gmail.com',
                'phone' => '02449678008',
                'address' => 'Via Roma 4'
            ],
            [
                'name' => 'Jeff',
                'surname' => 'Bezos',
                'vat' => '12345678919',
                'email' => 'bezos@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Amazing Food',
                'emailRestaurant' => 'amazing@gmail.com',
                'phone' => '02449678009',
                'address' => 'Via Washington 4'
            ],
            [
                'name' => 'Larry',
                'surname' => 'Page',
                'vat' => '12345678920',
                'email' => 'larry@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Food Maps - World Cook',
                'emailRestaurant' => 'foodmaps@gmail.com',
                'phone' => '02449678010',
                'address' => 'Via Terra 00'
            ],
            [
                'name' => 'Reed',
                'surname' => 'Hastings',
                'vat' => '12345678921',
                'email' => 'reed@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Streaming Foodies',
                'emailRestaurant' => 'streaming@gmail.com',
                'phone' => '02449678011',
                'address' => 'Via Universe'
            ],
            [
                'name' => 'Masashi',
                'surname' => 'Kishimoto',
                'vat' => '12345678922',
                'email' => 'kishimoto@gmail.com',
                'password' => '12345678',
                'nameRestaurant' => 'Ramen & Sushi - Japan Tradition',
                'emailRestaurant' => 'r&s@gmail.com',
                'phone' => '02449678012',
                'address' => 'Via Tokyio 8'
            ],
     
        ];

        foreach($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->surname = $user['surname'];
            $newUser->vat = $user['vat'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->nameRestaurant = $user['nameRestaurant'];
            $newUser->emailRestaurant = $user['emailRestaurant'];
            $newUser->phone = $user['phone'];
            $newUser->address = $user['address'];
            $newUser->save();
        }
    }
}

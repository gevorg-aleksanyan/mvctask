<?php

class ReviewController extends Controller
{
    public function reviewProductAction(){
        $model = new Users();
        $user_id =  App::session()->get('user_id');
        $user = $model->select()->where(['id'=>$user_id])->first();
        $prod_id = App::request()->get('prod_id');
        $this->render('product/reviewProduct',['prod_id'=>$prod_id,'user'=>$user]);

    }

    public function createReviewAction(){
        $model = new Users();
        $user_id = App::session()->get('user_id');
        $user = $model->select()->where(['id'=>$user_id])->first();
        $username = $user['name'];
        $product_name = App::request()->post('prod_id');
        $stars = App::request()->post('star');
        $comment = App::request()->post('comment');

        $data = [
            'user_name' => $username,
            'product_name' => $product_name,
            'stars' => $stars,
            'comment' => $comment

        ];
        $review= new Review();
        $review->table='reviews';

        if($review->create($data)){

            $prod = new Product();
            $product = $prod->select()->where(['id'=>$product_name])->first();
            if($product['avg_review'] == null){

                $data = [
                  'avg_review'=> $stars,
                ];

                $prod->update($data)->where(['id'=>$product_name]);
            }
            else{

                $products_review = $review->select('stars')->where(['product_name'=>$product_name])->get();
                foreach ($products_review as $stars){
                    $sum_number [] = $stars['stars'];
                }
                $sum =  array_sum($sum_number);

               $count =count( $products_review);
                $avg = $sum / $count;
                $avg_review = round($avg,1);
                $data = [
                    'avg_review'=> $avg_review,
                ];
                $prod->update($data)->where(['id'=>$product_name]);
            }
        }
        $this->redirect('user/profile');
    }

}
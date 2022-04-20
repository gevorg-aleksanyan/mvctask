<?php

class ProductController extends Controller
{

    public function create_indexAction(){
        $this->render('create');
    }

    public function createAction(){

            $photoName = '';
            $photo = App::request()->file('image');
            $photoExt = File::getFileExtension($photo);
            if(File::validate($photoExt,['gif','jpg','jpe','jpeg','png'])){
                $photoName =  File::upload($photo);

            }
            $name = App::request()->post('name');
            $description = App::request()->post('description');

            $data = [
                'name' => $name,
                'description' => $description,
                'image' => $photoName,

            ];
            $prod = new Product();
            $prod->table='product';
            $prod->create($data);
            $this->redirect('admin/admin');



    }

    public function editProductAction(){


            $prod = new Product();
            $prodEdit = $prod->select()->where(['id'=>App::request()->get('prod_id')])->first();

            if(App::request()->post('prod_id')){
                if(App::request()->file('image')!= ''){

                    $photoName = '';
                    $photo = App::request()->file('image');
                    $photoExt = File::getFileExtension($photo);
                    if(File::validate($photoExt,['gif','jpg','jpe','jpeg','png'])){
                        $photoName =  File::upload($photo);

                    }
                    $name = App::request()->post('name');
                    $description = App::request()->post('description');
                    $data=[
                        'name' => $name,
                        'description' => $description,
                        'image' => $photoName,

                    ];
                }
                else{
                    $name = App::request()->post('name');
                    $description = App::request()->post('description');
                    $data=[
                        'name' => $name,
                        'description' => $description,

                    ];
                }

                if ($prod->update($data)->where(['id'=>App::request()->post('prod_id')])) {
                    $this->redirect('admin/admin');
                }
            }



        $this->render('editProduct',['prodEdit'=>$prodEdit]);
    }

    public function deleteProductAction(){

        $prod_id = App::request()->get('prod_id');

            $prod = new Product();
            $prod->delete()->where(['id' => $prod_id]);
            $this->redirect('admin/admin');


    }

    public function singlProductAction()
    {
        $prod_id = App::request()->get('prod_id');
        $review = new Review();
        $review->table='reviews';
        $product = new Product();
        $reviews= $review->select()->where(['product_name'=>$prod_id])->get();
        $prod= $product->select()->where(['id'=>$prod_id])->first();

        $this->render('product/prodSinglpage', ['reviews'=>$reviews,'product'=>$prod]);







    }


}
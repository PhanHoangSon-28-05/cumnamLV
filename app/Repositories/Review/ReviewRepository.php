<?php

namespace App\Repositories\Review;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\CheckoutProduct;
use App\Models\ReviewImage;
use App\Repositories\BaseRepository;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Support\Str;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Review::class;
    }

    public function check($id_product, $email)
    {
        $check = Checkout::where('email', $email)->where('status', 1)->get()->modelKeys();
        if (count($check) <= 0) {
            return false;
        }

        $checkpro = CheckoutProduct::whereIn('checkout_id', $check)->where('product_id', $id_product)->get()->first();
        if ($checkpro) {
            return true;
        } else {
            return false;
        }
    }

    public function createReview($attributes = [])
    {
        $review = $this->model->create($attributes);
        return $review->id;
    }

    public function updateReview($id, $attributes = [])
    {
        $result = $this->find($id);
        // dd($result);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function UploadImageReview($id, $images)
    {
        // dd(count($this->images));
        if ($id != null) {
            if (count($images) > 0) {
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalName();
                    $filename = $id . '_' . time() . '_' . $extension;

                    $path =  $image->storeAs('reviews', $filename, 'public');

                    ReviewImage::create([
                        'review_id' => $id,
                        'image' => $path,
                    ]);
                }
                return true;
            }
        }
        return false;
    }

    public function getReview($product_id)
    {
        $listreview = $this->model->where('product_id', $product_id)->orderBy('created_at', 'desc')->get();
        return $listreview;
    }

    public function getReviewSlug($slug)
    {
        $review = $this->model->where('slug', $slug)->first();
        return $review;
    }

    public function showStar($product_id)
    {
        $reviews = $this->model->where('product_id', $product_id)->get();
        $attributes = [];
        $star_1 = 0;
        $star_2 = 0;
        $star_3 = 0;
        $star_4 = 0;
        $star_5 = 0;
        $star_sum = 0;
        foreach ($reviews as $value) {
            if ($value->star == 1) {
                $star_1 += 1;
            }

            if ($value->star == 2) {
                $star_2 += 1;
            }

            if ($value->star == 3) {
                $star_3 += 1;
            }

            if ($value->star == 4) {
                $star_4 += 1;
            }

            if ($value->star == 5) {
                $star_5 += 1;
            }
            $star_sum += $value->star;
        }

        $count = count($reviews);
        $attributes['star_1'] = $star_1;
        $attributes['star_2'] = $star_2;
        $attributes['star_3'] = $star_3;
        $attributes['star_4'] = $star_4;
        $attributes['star_5'] = $star_5;
        $attributes['count'] = $count;
        $attributes['sum'] = $count > 0 ? $star_sum / $count : 0;
        $attributes['star_1_avg'] = $count > 0 ? $star_1 / $count : 0;
        $attributes['star_2_avg'] = $count > 0 ? $star_2 / $count : 0;
        $attributes['star_3_avg'] = $count > 0 ? $star_3 / $count : 0;
        $attributes['star_4_avg'] = $count > 0 ? $star_4 / $count : 0;
        $attributes['star_5_avg'] = $count > 0 ? $star_5 / $count : 0;
        return $attributes;
    }
}

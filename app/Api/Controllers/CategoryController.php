<?php
/**
 * Created by PhpStorm.
 * User: jessynt
 * Date: 2016/12/14
 * Time: 上午10:37
 */

namespace App\Api\Controllers;


use App\Api\Transformers\CategoryTransformer;
use App\Repositories\CategoryRepository;

class CategoryController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {

        $this->categoryRepository = $categoryRepository;
    }

    public function show($name)
    {
        $category = $this->categoryRepository->getCategoryByName($name);
        return $this->item($category, new CategoryTransformer());
    }
}
<?php

declare(strict_types=1);

namespace Codenip\Tests\Structural\DependencyInjection;

use Codenip\Structural\DependencyInjection\Model\Product;
use Codenip\Structural\DependencyInjection\ProductService;
use Codenip\Structural\DependencyInjection\Repository\MySQLProductRepository;
use Codenip\Structural\DependencyInjection\Repository\ProductRepository;
use Codenip\Structural\DependencyInjection\Repository\RedisProductRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

use function ob_get_clean;
use function ob_start;

class DependencyInjectionTest extends TestCase
{
    private readonly MockObject|ProductRepository $productRepository;
    private readonly ProductService $productService;

    protected function setUp(): void
    {
        $this->productRepository = $this->createMock(ProductRepository::class);
        $this->productService = new ProductService($this->productRepository);
    }

    public function testDependencyInjectionWithMock(): void
    {
        $id = 1;
        $name = 'Product 1';
        $price = 1000.00;

        $this->productRepository
            ->expects($this->once())
            ->method('save')
            ->with(
                $this->callback(function (Product $product) use ($id, $name, $price): bool {
                    return $product->getId() === $id
                        && $product->getName() === $name
                        && $product->getPrice() === $price;
                }),
            );

        $this->productService->createProduct($id, $name, $price);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testDependencyInjection(ProductService $productService, string $expectedOutput): void
    {
        ob_start();
        $productService->createProduct(1, 'Product', 1000.00);
        $output = ob_get_clean();

        self::assertEquals($expectedOutput, $output);
    }

    public static function dataProvider(): iterable
    {
        yield 'MySQL repository' => [
            'service' => new ProductService(new MySQLProductRepository()),
            'expectedOutput' => 'Saving product with MySQLProductRepository',
        ];

        yield 'Redis repository' => [
            'service' => new ProductService(new RedisProductRepository()),
            'expectedOutput' => 'Saving product with RedisProductRepository',
        ];
    }
}

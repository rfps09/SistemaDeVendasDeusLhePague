<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Edição de Produto</title>
</head>
<body >
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="arrow" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </symbol>
    </svg>

    <div class="container">
        <main class="row justify-content-md-center">
            <div class="py-5 text-center">
                <a class="btn btn-outline-secondary" href="{{ back()->getTargetUrl() }}">
                    <svg class="bi bi-arrow-left-circle-fill pr-2" width="18" height="18"><use xlink:href="#arrow"/></svg>
                    <span class="ml-2">Voltar</span>
                </a>
                <h2>Edição de Produto</h2>
            </div>

            <div class="col col-lg-5">
                <form class="needs-validation" action="{{ route('editarProduto', ['id' => $produto->codProduto]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="descricao" class="form-label">Nome</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Nome" value="{{$produto->descricao}}" required>
                            <div class="invalid-feedback">
                                O nome é necessario.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="valorUnitario" class="form-label">Valor Unitário </label>
                        <input type="text" class="form-control" id="valorUnitario" name="valorUnitario" placeholder="9999.99" value="{{$produto->valorUnitario}}" required>
                        <div class="invalid-feedback">
                            Insira um valor.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="unidade" class="form-label">Unidade</label>
                        <input type="text" class="form-control" id="unidade" name="unidade" placeholder="1" value="{{$produto->unidade}}" required>
                        <div class="invalid-feedback">
                            Insira a quantidade por unidade.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="estoqueMinimo" class="form-label">Estoque mínimo</label>
                        <input type="text" class="form-control" id="estoqueMinimo" name="estoqueMinimo" placeholder="1" value="{{$produto->estoqueMinimo}}" required>
                        <div class="invalid-feedback">
                            Insira uma quantidade mínima de estoque.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="qtdEstoque" class="form-label">Quantidade no Estoque</label>
                        <input type="text" class="form-control" id="qtdEstoque" name="qtdEstoque" placeholder="1" value="{{$produto->qtdEstoque}}" required>
                        <div class="invalid-feedback">
                            Insira uma quantidade de estoque.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Envie uma imagem</label>
                        <input class="form-control form-control-sm" id="image" name="image" type="file">
                    </div>                          

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Editar</button>
                </form>
                
            </div>
        </main>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h4 class="modal-title">Cadastro de Produto</h4>
        </div>
        <div class="modal-body">
         <form>
    <div class="grid">
        <div class="row">  
            <div class="form-group col-sm-4">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do Produto">
            </div>
            <div class="form-group col-sm-4">
                <label for="marcaProduto">Marca</label>
                <input type="text" class="form-control" id="marcaProduto" placeholder="Marca do Produto">
            </div>
            <div class="form-group col-sm-4">
                <label for="unidadeProduto">Unidade</label>
                <input type="text" class="form-control" id="unidadeProduto" placeholder="Unidade do Produto">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                 <label for="tipoProduto">Tipo</label>
                <input type="text" class="form-control" id="tipoProduto" placeholder="Tipo do Produto">
            </div>
        </div>
        <div class="form-group">
            <button type='button' class="btn btn-success" id='inserirProduto'>Gravar</button>
        </div>
    </div>
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>


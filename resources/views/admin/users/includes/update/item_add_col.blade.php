 <div class="card">
     <div class="card-body">
         <button type="submit" class="btn btn-block btn-primary">Сохранить</button>
         <hr>
         <div class="form-group">
             <label for="id">ID:</label>
             <input name='id' value="{{ $item->id }}"
                    id='id'
                    type="text"
                    class="form-control"
                    disabled>
         </div>
         <hr>
         <div class="form-group">
             <label for="created_at">Создано</label>
             <input name='created_at' value="{{ $item->created_at }}"
                    id='created_at'
                    type="text"
                    class="form-control"
                    disabled>
         </div>

         <div class="form-group">
             <label for="updated_at">Изминено</label>
             <input name='updated_at' value="{{ $item->updated_at }}"
                    id='updated_at'
                    type="text"
                    class="form-control"
                    disabled>
         </div>
         <hr>
         <div class="form-group">
             <label for="deleted_at">Удалино</label>
             <input name='deleted_at' value="{{ $item->deleted_at }}"
                    id='deleted_at'
                    type="text"
                    class="form-control"
                    disabled>
         </div>
     </div>
</div>

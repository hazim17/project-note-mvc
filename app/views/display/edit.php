<!--  Box for edit data -->
<div>
    <div>
        <h5>Edit Data Note</h5>

        <div class="container">
            <form action="<?= BASEURL; ?>/display/editnote" method="post">
                <!-- Form for id -->
                <input type="hidden" name="id" id="id" value="<?= $data['note']['id']; ?>" >

                <div class="field">
                    <label for="titlenote">Title Note:</label>
                    <input type="text" name="titlenote" id="titlenote" required value="<?= $data['note']['titlenote']; ?>">
                </div>

                <div class="field">
                    <label for="contentnote">Content Note:</label>
                    <textarea name="contentnote" id="contentnote" required><?= $data['note']['contentnote']; ?></textarea>
                </div>
        
                <div>
                    <button type="submit" class="inputbtn showeditmodal">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
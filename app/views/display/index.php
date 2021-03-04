

<!-- Flash message -->
<div>
     <!-- Because method in Flasher.php is static, so call it use :: -->
     <?PHP Flasher::flash(); ?>
</div>


<!-- Insert Data -->
<div>
    <!-- Button for go to insert data form -->
    <!-- Button trigger modal -->
    <button type="button" class="button-style trigger adddatabtn" >
        Add Note.
    </button>
</div>


<!-- Display body -->
<div class="container flex">
    <?php foreach($data['note'] as $datum): ?>
        <ul>
            <li class="card">
                <div>
                    <a href="<?= BASEURL; ?>/display/edit/<?= $datum['id']; ?>" class="detail showeditmodal"  data-id="<?= $datum['id']; ?>">Edit</a> |

                    <a href="<?= BASEURL; ?>/display/delete/<?= $datum['id']; ?>" class="detail" onClick="return confirm('are you sure?')">Delete</a>

                    <h2 class="titlenote"><?= $datum['titlenote']; ?></h2>
                    <p class="contentnote" id="contentnote"><?= $datum['contentnote']; ?>
                    </p>

                    <a href="<?= BASEURL; ?>/display/detail/<?= $datum['id']; ?>" class="detail">Detail</a>

                <div>
            </li>
        </ul>
    <?php endforeach; ?>
</div>


<!-- Modal Box for insert data -->
<div class="modal" id="formModal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h5 id="forModalLabel">Add Data Note</h5>

        <div class="container modal-body">
            <form action="<?= BASEURL; ?>/display/addnote" method="post">
                <!-- Form for id -->
                <input type="hidden" name="id" id="id">

                <div class="field">
                    <label for="titlenote">Title Note:</label>
                    <input type="text" name="titlenote" placeholder="Title" id="titlenote" required>
                </div>

                <div class="field">
                    <label for="contentnote">Content Note:</label>
                    <textarea name="contentnote" placeholder="Content" id="contentnote" required></textarea>
                </div>
        
                <div class="modal-footer">
                    <button type="submit" class="inputbtn">Input</button>
                </div>
            </form>
        </div>
    </div>
</div>





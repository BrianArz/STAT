function phpController(operation, idExam)
{
    $.ajax({
        url: '../controllers/myexamsController.php',
        type: 'POST',
        data: {operation: operation, idExam: idExam},
        success: function(response) {
            location.reload();
        },
        error: function(xhr, status, error) {
            
        }
    });
}
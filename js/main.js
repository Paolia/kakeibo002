$("#submit").on("click", function () {
    const name = $("#name").val();
    localStorage.setItem("exams", name);
});
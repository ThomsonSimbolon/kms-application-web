// Membuat delay alert
$(document).ready(function () {
  // Menghilangkan alert setelah 3 detik
  setTimeout(function () {
    $(".alert").fadeOut();
  }, 3000);
});
// End Membuat delay alert

// Sweet alert untuk hapus data user
$(document).on("click", "#hapusBtn", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/admin/user";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// End Sweet alert untuk hapus data user

// Sweet alert untuk hapus data dokumen admin
$(document).on("click", "#hapusBtn2", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/admin/document";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data dokumen admin

// Sweet alert untuk hapus data log aktivitas
$(document).on("click", "#hapusBtn3", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/admin/LogAktivitas";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data log aktivitas

// Sweet alert untuk hapus data dokumen dosen
$(document).on("click", "#hapusBtn4", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/dosen/document";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data dokumen dosen

// Sweet alert untuk hapus data pengetahuan mahasiswa
$(document).on("click", "#hapusBtn5", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/mahasiswa/pengetahuan";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data pengetahuan mahasiswa

// Sweet alert untuk hapus data materi dosen
$(document).on("click", "#hapusBtn6", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/dosen/materi";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data materi dosen

// Sweet alert untuk hapus data materi admin
$(document).on("click", "#hapusBtn7", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/admin/materi";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data materi admin

// Sweet alert untuk hapus data pengetahuan admin
$(document).on("click", "#hapusBtn8", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/admin/pengetahuan";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data pengetahuan admin

// Sweet alert untuk hapus data forum diskusi admin
$(document).on("click", "#hapusBtn9", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/admin/discussion";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});

// Sweet alert untuk hapus data forum diskusi admin

// Sweet alert untuk hapus data komentar admin

// Sweet alert untuk hapus data komentar admin

// Sweet alert untuk hapus data berita admin
$(document).on("click", "#hapusBtn10", function (e) {
  e.preventDefault();
  var url = $(this).attr("href");

  Swal.fire({
    title: "Apakah Anda yakin?",
    text: "Data akan dihapus secara permanen!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#28a745",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });
          Toast.fire({
            icon: "success",
            title: "Anda berhasil menghapus data!",
          }).then(() => {
            localStorage.clear();
            window.location.href = "/admin/berita";
          });
        },
        error: function () {
          Swal.fire(
            "Gagal!",
            "Terjadi kesalahan saat menghapus data.",
            "error"
          );
        },
      });
    }
  });
});
// Sweet alert untuk hapus data berita admin

// Sweet alert logout

const logout = document.getElementById("logoutBtn");
// Pengecekan logoutBtn
if (logout) {
  logout.addEventListener("click", () => {
    Swal.fire({
      title: "Konfirmasi Logout?",
      text: "Anda yakin ingin logout!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, saya yakin!",
    }).then((result) => {
      if (result.isConfirmed) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          },
        });
        Toast.fire({
          icon: "success",
          title: "Anda keluar dari sesi!",
        }).then(() => {
          localStorage.clear();
          window.location.href = "/auth/logout";
        });
      }
    });
  });
}

// Script untuk menampilkan zoom in dan zoom out dari card-img berita (admin)

// End script untuk menampilkan zoom in dan zoom out dari card-img berita (admin)

// Script untuk menampilkan data yang upload yang ada di form tambah dan edit
$(document).on("change", "#file", function (e) {
  e.preventDefault();
  var fileName = e.target.files[0].name;
  var nextSibling = e.target.nextElementSibling;
  nextSibling.innerText = fileName;
});
// End Script untuk menampilkan data yang upload yang ada di form tambah dan edit

// Script untuk menampilkan data yang upload yang ada di form tambah dan edit
$(document).on("change", "#file_path", function (e) {
  e.preventDefault();
  var fileName = e.target.files[0].name;
  var nextSibling = e.target.nextElementSibling;
  nextSibling.innerText = fileName;
});
// End Script untuk menampilkan data yang upload yang ada di form tambah dan edit

// Script untuk menampilkan data upload foto profile yang ada di form tambah dan edit
$(document).on("change", "#upload_foto", function (e) {
  e.preventDefault();
  var fileName = e.target.files[0].name;
  var nextSibling = e.target.nextElementSibling;
  nextSibling.innerText = fileName;
});
// End Script untuk menampilkan data upload foto profile yang ada di form tambah dan edit

// Jquery untuk menampilkan nav-link secara otomatis saat kursor mengarah ke dropdown nav-link [navbar]
$(document).ready(function () {
  $(".nav-item.dropdown").hover(
    function () {
      $(this).addClass("show").find(".dropdown-menu").addClass("show");
    },
    function () {
      $(this).removeClass("show").find(".dropdown-menu").removeClass("show");
    }
  );
});

$(document).ready(function () {
  $(".btn-group").hover(
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(200);
    },
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(200);
    }
  );
});

$(document).ready(function () {
  $(".btn-group").hover(
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(200);
    },
    function () {
      $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(200);
    }
  );
});
// End Jquery untuk menampilkan nav-link secara otomatis saat kursor mengarah ke dropdown nav-link [navbar]

// Script untuk menampilkan password
$(document).ready(function () {
  $("#showPasswordCheck").change(function () {
    var passwordInput = $("#password");
    if ($(this).is(":checked")) {
      passwordInput.attr("type", "text");
    } else {
      passwordInput.attr("type", "password");
    }
  });
});

// End script untuk menampilkan password

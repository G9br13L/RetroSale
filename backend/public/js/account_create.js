document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("btnCreateAccount");
  const cancelBtn = document.getElementById("btnCancelCreateAccount");
  const modal = document.getElementById("createAccountModal");
  const backdrop = document.getElementById("createAccountModalBackdrop");

  if (!openBtn || !modal) {
    return;
  }

  // Open modal
  openBtn.addEventListener("click", () => {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
  });

  // Close modal
  const closeModal = () => {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  };

  if (cancelBtn) cancelBtn.addEventListener("click", closeModal);
  if (backdrop) backdrop.addEventListener("click", closeModal);

});

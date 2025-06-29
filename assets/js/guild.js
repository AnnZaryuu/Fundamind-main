document.addEventListener("DOMContentLoaded", () => {
  const guildMaster = document.getElementById("guildMaster");
  const guildModal = document.getElementById("guildModal");
  const chatText = document.getElementById("chatText");
  const nextChat = document.getElementById("nextChat");

  const chatMessages = [
    "Selamat datang di Guild, anak muda.",
    "Di tempat ini, petualangan dan ujian menanti mereka yang berani.",
    "Jelajahilah tanpa ragu, Papan Paling lebar adalah Quest utama.",
    "Semoga cahaya pengetahuan membimbing langkahmu dalam perjalanan panjang ini.",
  ];
  let currentMessageIndex = 0;

  guildMaster.addEventListener("click", () => {
    guildModal.classList.remove("hidden");
    chatText.textContent = chatMessages[currentMessageIndex];
  });

  nextChat.addEventListener("click", () => {
    currentMessageIndex++;
    if (currentMessageIndex < chatMessages.length) {
      chatText.textContent = chatMessages[currentMessageIndex];
    } else {
      guildModal.classList.add("hidden");
      currentMessageIndex = 0;
    }
  });
});

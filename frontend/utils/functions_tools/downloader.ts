export default function downloader(fileName: string | undefined, data: any) {
  if (fileName) {
    const url = window.URL.createObjectURL(new Blob([data]));

    const link = document.createElement("a");
    link.href = url;
    link.setAttribute("download", fileName);
    document.body.appendChild(link);
    link.click();

    link.parentNode?.removeChild(link);
    window.URL.revokeObjectURL(url);
  }
}

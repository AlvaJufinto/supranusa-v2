import {
    getDocument,
    GlobalWorkerOptions,
} from "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.10.38/pdf.min.mjs";

GlobalWorkerOptions.workerSrc =
    "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/4.10.38/pdf.worker.min.mjs";

export async function renderPdfThumbnail(container) {
    const url = container.dataset.pdfPreview;
    const canvas = container.querySelector(".pdf-thumbnail");
    const loading = container.querySelector(".pdf-loading");

    if (!url || !canvas) return;
    if (container.dataset.pdfRendered === "true") return;
    container.dataset.pdfRendered = "true";

    try {
        const pdf = await getDocument({ url, withCredentials: false }).promise;
        const page = await pdf.getPage(1);
        const vp = page.getViewport({ scale: 1 });

        const scaleX = container.clientWidth / vp.width;
        const scaleY = container.clientHeight / vp.height;

        // PERUBAHAN 1: Gunakan Math.max agar resolusi PDF mengisi penuh container (cover)
        const viewport = page.getViewport({ scale: Math.max(scaleX, scaleY) });
        const dpr = window.devicePixelRatio || 1;

        canvas.width = Math.floor(viewport.width * dpr);
        canvas.height = Math.floor(viewport.height * dpr);

        // PERUBAHAN 2: Serahkan urusan layouting ke CSS
        canvas.style.width = "100%";
        canvas.style.height = "100%";
        canvas.style.objectFit = "cover";

        const ctx = canvas.getContext("2d");
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        await page.render({ canvasContext: ctx, viewport }).promise;

        if (loading) loading.style.display = "none";
    } catch (e) {
        console.error("Failed to render PDF:", url, e);
        if (loading) {
            loading.innerHTML = `<div class="text-center"><div class="mb-1 text-3xl">📄</div><span class="text-[10px] text-slate-500">PDF Preview</span></div>`;
        }
    }
}

export function renderAllPdfThumbnails() {
    document.querySelectorAll("[data-pdf-preview]").forEach(renderPdfThumbnail);
}

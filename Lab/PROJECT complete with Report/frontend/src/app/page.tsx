import Hero from "@/app/components/Hero";
import CategoryGrid from "@/app/components/CategoryGrid";
import Footer from "@/app/components/Footer";

export default function Home() {
  return (
    <main className="min-h-screen bg-white">
      <Hero />
      <CategoryGrid />
      <Footer />
    </main>
  );
}

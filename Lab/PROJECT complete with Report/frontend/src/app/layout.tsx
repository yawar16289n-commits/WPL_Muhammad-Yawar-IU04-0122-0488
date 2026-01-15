import type { Metadata } from "next";
import "@/styles/globals.css";
import Header from '@/app/components/Header';

export const metadata: Metadata = {
  title: "HY Academy - Learn without limits",
  description: "Build skills for today, tomorrow, and beyond",
};

export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  return (
    <html lang="en">
      <body>
        <Header />

        {children}
      </body>
    </html>
  );
}

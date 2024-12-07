import { motion, useAnimation } from "framer-motion";
import { useEffect } from "react";
import Link from "next/link";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "@/components/ui/tooltip";
import MenuIcons from "./menuIcons";

export const HomeMotionIcon = () => {
  const controls = useAnimation();

  const animateIcon = async () => {
    controls.start({ scale: 1 });

    await controls.start({ scale: 1.5 });

    await controls.start({ scale: 1 });
  };

  useEffect(() => {
    animateIcon();
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  return (
    <motion.div className="ml-3 mt-3" animate={controls}>
      <TooltipProvider>
        <Tooltip>
          <TooltipTrigger>
            <Link href="/home">
              <MenuIcons
                name="IoHomeOutline"
                className="text-4xl transition-icons hover:cursor-pointer text-cyan-600 text-opacity-95 bg-transparent"
              />
            </Link>
          </TooltipTrigger>
          <TooltipContent>
            <h1>Página Inicial</h1>
          </TooltipContent>
        </Tooltip>
      </TooltipProvider>
    </motion.div>
  );
};

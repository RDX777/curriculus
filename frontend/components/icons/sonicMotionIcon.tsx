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

export const SonicMotionIcon = () => {
  const controls = useAnimation();

  useEffect(() => {
    const run = async () => {
      await controls.start({
        transition: { duration: 1, ease: "easeInOut" },
      });
      await controls.start({
        transition: { duration: 0.5, ease: "easeOut" },
      });
      await controls.start({
        x: 0,
        transition: { duration: 0.5, ease: "easeInOut" },
      });
    };

    run();
  }, [controls]);

  return (
    <motion.div className="ml-3 mt-2" animate={controls}>
      <TooltipProvider>
        <Tooltip>
          <TooltipTrigger>
            <Link href="/home">
              <MenuIcons
                name="LiaRobotSolid"
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
